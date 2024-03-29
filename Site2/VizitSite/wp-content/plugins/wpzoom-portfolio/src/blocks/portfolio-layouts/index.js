import { InspectorControls } from '@wordpress/block-editor';
import { registerBlockType } from '@wordpress/blocks';
import { Disabled, PanelBody, Placeholder } from '@wordpress/components';
import { withSelect } from '@wordpress/data';
import { Fragment } from '@wordpress/element';
import { addQueryArgs } from '@wordpress/url';
import { __ } from '@wordpress/i18n';
const { serverSideRender: ServerSideRender } = wp;

import ReactSelect from 'react-select';

/**
 * Internal dependencies
 */
//import Edit from './edit';
function getPostEditURL( layoutId ) {
	return addQueryArgs('post.php', {
		post: layoutId,
		action: 'edit'
	});
}
/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType( 'wpzoom-blocks/portfolio-layouts', {
    title:       __( 'Portfolio Layouts', 'wpzoom-portfolio' ),
    description: __( 'Select and display one of your portfolio layouts', 'wpzoom-portfolio' ),
    icon: 'layout',
    category:    'wpzoom-blocks',
    supports:    { align: true, html: false },
    attributes:  {
        layoutId: {
            type:    'string',
            default: '-1'
        }
    },
    example:     {},
    edit: withSelect( ( select ) => {
        const { getEntityRecords } = select( 'core' );
        return {
            posts: getEntityRecords( 'postType', 'portfolio_layout', { order: 'desc', orderby: 'date', per_page: -1 } )
        };
    } )( ( props ) => {
        const { attributes, posts, setAttributes } = props;
        const { layoutId } = attributes;
        const _layoutId = layoutId && String( layoutId ).trim() != '' ? String( layoutId ) : '-1';
        //const recipePosts = posts && posts.length > 0 ? posts.map( ( x ) => { return { key: String( x.id ), name: x.title.raw } } ) : [];
        const recipeReactSelectPosts = posts && posts.length > 0 ? posts.map( ( x ) => ( { value:x.id, label: x.title.raw  } ) ) : [];
        const postReactSelect = (
            <ReactSelect
				className="wpzoom-select-portfolio-layouts"
				aria-labelledby="layouts-select"
				options={ recipeReactSelectPosts }
				value={ _layoutId }
				onChange={ ( value ) => setAttributes( { layoutId: String( value ) } ) }
				simpleValue
				clearable={true}
			/>
        );
		
		const getCPTEditURL = getPostEditURL( _layoutId );
		const editCPT = <p class="wpzoom-edit-link-description">{ __( 'Edit the layout', 'wpzoom-portfolio' ) } <a href={getCPTEditURL}>{__( 'here', 'wpzoom-portfolio' ) }</a></p>;

        return (
            // eslint-disable-next-line react/jsx-no-undef
            <React.Fragment>
                <InspectorControls>
                    <PanelBody title={ __( 'Options', 'wpzoom-portfolio' ) }>
                        { recipeReactSelectPosts.length > 0 ? postReactSelect : <Disabled>{ postReactSelect }</Disabled> }
						{ editCPT }
                    </PanelBody>
                </InspectorControls>
                <Fragment>
                    { '-1' != _layoutId ?
                        <ServerSideRender block="wpzoom-blocks/portfolio-layouts" attributes={ attributes } /> :
                        <Placeholder label={ __( 'Portfolio Layout', 'wpzoom-portfolio' ) }>
                            { recipeReactSelectPosts.length > 0 ? postReactSelect : <Disabled>{ postReactSelect }</Disabled> }
                        </Placeholder>
					}
                </Fragment>
            </React.Fragment>
        );
    } )
} );