'use strict';

import json from '../../block.json';
import classnames from 'classnames';
import styled from '@emotion/styled';
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useState, useEffect, RawHTML } from '@wordpress/element';
import {
	useBlockProps,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
	__experimentalColorGradientSettingsDropdown as ColorGradientSettingsDropdown
} from '@wordpress/block-editor';
import {
	BaseControl,
	TextControl,
	Button,
	Spinner,
	Flex,
	FlexItem,
	RadioControl,
	__experimentalUnitControl as UnitControl,
	__experimentalAlignmentMatrixControl as AlignmentMatrixControl,
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOptionIcon as ToggleGroupControlOptionIcon,
	__experimentalToolsPanel as ToolsPanel,
	__experimentalToolsPanelItem as ToolsPanelItem,
	__experimentalVStack as VStack
} from '@wordpress/components';
import * as playIcons from './icons';
import urlParser from 'js-video-url-parser/lib/base';
import 'js-video-url-parser/lib/provider/youtube';
import 'js-video-url-parser/lib/provider/vimeo';
import embed from 'embed-video';

const translateAlignments = i => i.replace( 'top', 'start' ).replace( 'left', 'start' ).replace( 'bottom', 'end' ).replace( 'right', 'end' );

const htmlString = html => RawHTML( { children: html } );

const contentOutput = ( attributes, save = false ) => {
	const { source, url, libraryId, text, position, icon, iconColor, iconSize } = attributes;
	const libId      = parseInt( libraryId, 10 );
	const ico        = icon && icon > 0 && icon < 5 ? playIcons[`icon${icon}`] : playIcons.icon1;
	const iClr       = iconColor ? iconColor : undefined;
	const iSize      = iconSize ? iconSize : undefined;
	const iconStyle  = typeof iClr !== 'undefined' || typeof iSize !== 'undefined' ? { color: iClr, height: iSize, width: iSize } : undefined;
	const posArgs    = position && typeof position === 'string' && position.trim().length > 0 ? translateAlignments( position ).split( ' ' ) : [];
	const alignVert  = posArgs.length > 0 ? posArgs[0] : undefined;
	const alignHorz  = posArgs.length > 1 ? posArgs[1] : undefined;
	const buttonHref = url && typeof url === 'string' && url.length > 0 && ( ( 'service' === source && typeof urlParser.parse( url ) !== 'undefined' ) || 'local' === source ) ? url : undefined;
	const blkProps   = { className: 'wpzoom-video-popup-block', href: buttonHref, style: { alignItems: alignVert, justifyContent: alignHorz } };
	if ( ! save ) blkProps.onClick = e => e.preventDefault();
	const blockProps = save ? useBlockProps.save( blkProps ) : useBlockProps( blkProps );

	return (
		<a { ...blockProps }>
			<span className="wpzoom-video-popup-block_icon" style={ iconStyle }>{ ico }</span>
			{ typeof text !== 'undefined' && text }
		</a>
	);
};

registerBlockType(
	json.name,
	{
		edit: ( props ) => {
			const { attributes, setAttributes, clientId } = props;
			const { source, url, libraryId, text, position, icon, iconColor, iconSize } = attributes;
			const [ state, setState ] = useState( { thumbnail: '', loading: false } );
			const libId = parseInt( libraryId, 10 );
			const Root = styled.div`box-sizing: border-box; max-width: 235px; padding-bottom: 12px; width: 100%;`;
			const Header = styled( Flex )`margin-bottom: 8px;`;
			const HeaderControlWrapper = styled( Flex )`min-height: 30px; gap: 0;`;

			const getVideoThumbnail = value => {
				if ( value.length > 0 ) {
					const urlParsed = urlParser.parse( value );

					if ( typeof urlParsed !== 'undefined' ) {
						if ( '' !== state.thumbnail || true !== state.loading ) {
							setState( { thumbnail: '', loading: true } );
						}

						const thumbSize = 'vimeo' === urlParsed.provider
							? 'thumbnail_large'
							: ( 'dailymotion' === urlParsed.provider
								? 'thumbnail_1080_url'
								: 'maxresdefault' );

						embed.image( value, { image: thumbSize }, ( err, thumb ) => {
							if ( err ) {
								if ( '' !== state.thumbnail || false !== state.loading ) {
									setState( { thumbnail: '', loading: false } );
								}

								throw err;
							} else {
								if ( thumb.src !== state.thumbnail || false !== state.loading ) {
									setState( { thumbnail: thumb.src, loading: false } );
								}
							}
						} );

						return;
					}
				}

				if ( '' !== state.thumbnail || false !== state.loading ) {
					setState( { thumbnail: '', loading: false } );
				}
			};

			useEffect( () => getVideoThumbnail( url || '' ), [ url ] );

			return (
				<>
					<InspectorControls>
						<div className="wpzoom-video-popup-block-inspector">
							<ToolsPanel
								label={ __( 'Content', 'wpzoom-video-popup-block' ) }
								resetAllFilter={ ( attrs ) => ( { ...attrs, source: undefined, url: undefined, libraryId: undefined, icon: undefined, text: undefined } ) }
							>
								<ToolsPanelItem
									label={ __( 'Video URL', 'wpzoom-video-popup-block' ) }
									hasValue={ () => !! url }
									onDeselect={ () => setAttributes( { source: undefined, url: undefined, libraryId: undefined } ) }
									isShownByDefault
									resetAllFilter={ attrs => ( { ...attrs, source: undefined, url: undefined, libraryId: undefined } ) }
								>
									<VStack className="video-url-input">
										<RadioControl
											className="video-source-radio"
											label={ __( 'Video Source', 'wpzoom-video-popup-block' ) }
											selected={ source || 'service' }
											options={ [
												{
													value: 'service',
													label: htmlString( __( 'External <small><em>(i.e. YouTube, Vimeo, etc.)</em></small>', 'wpzoom-video-popup-block' ) )
												},
												{
													value: 'local',
													label: htmlString( __( 'Self-hosted MP4 <small><em>(i.e. Media Library)</em></small>', 'wpzoom-video-popup-block' ) )
												},
											] }
											onChange={ value => {
												setAttributes( { source: value, url: undefined, libraryId: undefined } );
												setState( { thumbnail: '', loading: false } );

												if ( 'service' === value ) {
													getVideoThumbnail( url || '' );
												}
											} }
										/>

										{ 'service' === source && <TextControl
											label={ __( 'Video URL', 'wpzoom-video-popup-block' ) }
											placeholder={ __( 'e.g. https://youtu.be/GRMSwnJzRDA', 'wpzoom-video-popup-block' ) }
											value={ url || '' }
											onChange={ value => {
												setAttributes( { url: value } );
												getVideoThumbnail( value );
											} }
										/> }

										{ 'local' === source && <MediaUploadCheck>
											<MediaUpload
												onSelect={ media => {
													setAttributes( { url: media.url, libraryId: media.id } );
												} }
												onClose={ () => setState( { loading: false } ) }
												allowedTypes={ [ 'video' ] }
												value={ libraryId }
												render={ ( { open } ) => (
													<div>
														<Button variant="primary" onClick={ () => { setState( { loading: true } ); open() } }>
															{ libId > 0 ? __( 'Replace', 'wpzoom-video-popup-block' ) : __( 'Select', 'wpzoom-video-popup-block' ) }
														</Button>
														&nbsp;
														{ libId > 0 && (
															<Button
																onClick={ () => {
																	setAttributes( { url: undefined, libraryId: undefined } );
																	setState( { loading: false } );
																} }
																variant="secondary"
															>
																{ __( 'Remove', 'wpzoom-video-popup-block' ) }
															</Button>

														) }
													</div>
												) }
											/>
										</MediaUploadCheck> }

										<div className={ classnames( 'preview-image', { 'show-preview': ( ( 'local' === source && typeof url !== 'undefined' && '' !== ( '' + url ).trim() ) || state.loading || '' !== state.thumbnail ) } ) }>
											{ state.loading ?
												<Spinner />
											:
												( 'local' === source && typeof url !== 'undefined' && '' !== ( '' + url ).trim() ?
													<video muted={ true } preload="auto">
														<source src={ url } type="video/mp4" />
													</video>
												:
													<img src={ state.thumbnail } />
												)
											}
										</div>
									</VStack>
								</ToolsPanelItem>

								<ToolsPanelItem
									label={ __( 'Icon', 'wpzoom-video-popup-block' ) }
									hasValue={ () => !! icon }
									onDeselect={ () => setAttributes( { icon: undefined } ) }
									isShownByDefault
									resetAllFilter={ attrs => ( { ...attrs, icon: undefined } ) }
								>
									<ToggleGroupControl
										label={ __( 'Icon', 'wpzoom-video-popup-block' ) }
										value={ icon }
										onChange={ value => setAttributes( { icon: value } ) }
										__experimentalIsIconGroup
									>
										<ToggleGroupControlOptionIcon
											value={ 1 }
											icon={ playIcons.icon1 }
											label={ __( 'Icon 1', 'wpzoom-video-popup-block' ) }
										/>

										<ToggleGroupControlOptionIcon
											value={ 2 }
											icon={ playIcons.icon2 }
											label={ __( 'Icon 2', 'wpzoom-video-popup-block' ) }
										/>

										<ToggleGroupControlOptionIcon
											value={ 3 }
											icon={ playIcons.icon3 }
											label={ __( 'Icon 3', 'wpzoom-video-popup-block' ) }
										/>

										<ToggleGroupControlOptionIcon
											value={ 4 }
											icon={ playIcons.icon4 }
											label={ __( 'Icon 4', 'wpzoom-video-popup-block' ) }
										/>
									</ToggleGroupControl>
								</ToolsPanelItem>

								<ToolsPanelItem
									label={ __( 'Text', 'wpzoom-video-popup-block' ) }
									hasValue={ () => !! text }
									onDeselect={ () => setAttributes( { text: undefined } ) }
									isShownByDefault
									resetAllFilter={ attrs => ( { ...attrs, text: undefined } ) }
								>
									<TextControl
										label={ __( 'Text', 'wpzoom-video-popup-block' ) }
										placeholder={ __( 'e.g. Play', 'wpzoom-video-popup-block' ) }
										value={ text }
										onChange={ value => setAttributes( { text: value } ) }
									/>
								</ToolsPanelItem>
							</ToolsPanel>
						</div>
					</InspectorControls>

					<InspectorControls __experimentalGroup="color">
						<ToolsPanelItem
							label={ __( 'Icon', 'wpzoom-video-popup-block' ) }
							hasValue={ () => !! iconColor }
							onDeselect={ () => setAttributes( { iconColor: undefined } ) }
							panelId={ clientId }
							isShownByDefault={ false }
							resetAllFilter={ attrs => ( { ...attrs, iconColor: undefined } ) }
						>
							<ColorGradientSettingsDropdown
								__experimentalHasMultipleOrigins
								__experimentalIsRenderedInSidebar
								settings={ [
									{
										colorValue: iconColor,
										label: __( 'Icon', 'wpzoom-video-popup-block' ),
										onColorChange: value => setAttributes( { iconColor: value } ),
										isShownByDefault: false,
										disableCustomGradients: true,
										enableAlpha: true,
										resetAllFilter: () => ( { iconColor: undefined } )
									},
								] }
								panelId={ clientId }
							/>
						</ToolsPanelItem>
					</InspectorControls>

					<InspectorControls __experimentalGroup="dimensions">
						<ToolsPanelItem
							label={ __( 'Content Position', 'wpzoom-video-popup-block' ) }
							hasValue={ () => !! position }
							onDeselect={ () => setAttributes( { position: undefined } ) }
							panelId={ clientId }
							isShownByDefault={ false }
							resetAllFilter={ attrs => ( { ...attrs, position: undefined } ) }
						>
							<Root role="group">
								<Header className="component-box-control__header">
									<FlexItem>
										<BaseControl.VisualLabel>
											{ __( 'Content Position', 'wpzoom-video-popup-block' ) }
										</BaseControl.VisualLabel>
									</FlexItem>
								</Header>

								<HeaderControlWrapper className="component-box-control__header-control-wrapper">
									<AlignmentMatrixControl
										label={ __( 'Change content position', 'wpzoom-video-popup-block' ) }
										value={ position }
										onChange={ value => setAttributes( { position: value } ) }
									/>
								</HeaderControlWrapper>
							</Root>
						</ToolsPanelItem>

						<ToolsPanelItem
							label={ __( 'Icon Size', 'wpzoom-video-popup-block' ) }
							hasValue={ () => !! iconSize }
							onDeselect={ () => setAttributes( { iconSize: undefined } ) }
							panelId={ clientId }
							isShownByDefault={ false }
							resetAllFilter={ attrs => ( { ...attrs, iconSize: undefined } ) }
						>
							<Root role="group">
								<Header className="component-box-control__header">
									<FlexItem>
										<BaseControl.VisualLabel>
											{ __( 'Icon Size', 'wpzoom-video-popup-block' ) }
										</BaseControl.VisualLabel>
									</FlexItem>
								</Header>

								<HeaderControlWrapper className="component-box-control__header-control-wrapper">
									<UnitControl
										label={ __( 'Change icon size', 'wpzoom-video-popup-block' ) }
										hideLabelFromVision={ true }
										value={ iconSize }
										onChange={ value => setAttributes( { iconSize: value } ) }
										units={ [
											{ value: 'px', label: 'px', default: 64 },
											{ value: 'em', label: 'em', default: 2 },
											{ value: 'rem', label: 'rem', default: 4 },
										] }
									/>
								</HeaderControlWrapper>
							</Root>
						</ToolsPanelItem>
					</InspectorControls>

					{ contentOutput( attributes, false ) }
				</>
			);
		},

		save: props => contentOutput( props.attributes, true )
	}
);
