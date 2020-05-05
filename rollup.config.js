import { terser } from 'rollup-plugin-terser';
import typescript from 'rollup-plugin-typescript2';

// rollup.config.js
export default {
	input: 'assets/src-backend/script.js',
	external: [ 'jquery', 'ajaxurl' ],
	output: {
		file: 'assets/backend/script.js',
		format: 'iife',
		name: 'TWRP_Plugin',
		globals: {
			jquery: 'jQuery',
			ajaxurl: 'ajaxurl',
		},
		// plugins: [ terser() ],
	},
	plugins: [
		typescript( {
			tsconfigDefaults: {
				compilerOptions: {
					allowJs: true,
					checkJs: true,
					noEmit: true,
					allowSyntheticDefaultImports: true,
				},

			},
		} ),
	],
	watch: {
		include: 'assets/src-backend/**',
	},
};
