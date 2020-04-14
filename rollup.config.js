import { terser } from 'rollup-plugin-terser';

// rollup.config.js
export default {
	input: 'assets/src-backend/script.js',
	external: [ 'jquery' ],
	output: {
		file: 'assets/backend/script.js',
		format: 'iife',
		name: 'TWRP_Plugin',
		globals: {
			jquery: 'jQuery',
		},
		// plugins: [ terser() ],
	},
	watch: {
		include: 'assets/src-backend/**',
	},
};
