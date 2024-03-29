import fontFamilies from './fonts';
const { __ } = wp.i18n;

export const textTransformOptions = [
	{
		value: 'none',
		label: __( 'None', 'wpzoom-portfolio' ),
	},
	{
		value: 'uppercase',
		label: __( 'Uppercase', 'wpzoom-portfolio' ),
	},
	{
		value: 'lowercase',
		label: __( 'Lowercase', 'wpzoom-portfolio' ),
	},
	{
		value: 'capitalize',
		label: __( 'Capitalize', 'wpzoom-portfolio' ),
	},
];

export const fontWeightOptions = [
	'Normal',
	'Bold',
	'100',
	'200',
	'300',
	'400',
	'500',
	'600',
	'700',
	'800',
	'900',
].map((o) => ({ value: o, label: __( o, 'wpzoom-portfolio' ) }));

export const fontFamilyOptions = fontFamilies.map(( fontFamilyOption ) => ({
	value: fontFamilyOption,
	label: __( fontFamilyOption, 'wpzoom-portfolio' ),
}));
