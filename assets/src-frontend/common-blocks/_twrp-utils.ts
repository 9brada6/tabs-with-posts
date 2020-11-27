function isElement( element: unknown ): boolean {
	return element instanceof Element || element instanceof HTMLDocument;
}

function isNodeList( nodes: any ): boolean {
	const stringRepresentation = Object.prototype.toString.call( nodes );

	return typeof nodes === 'object' &&
        /^\[object (HTMLCollection|NodeList|Object)\]$/.test( stringRepresentation ) &&
        nodes.hasOwnProperty( 'length' ) &&
        ( nodes.length === 0 || ( typeof nodes[ 0 ] === 'object' && nodes[ 0 ].nodeType > 0 ) );
}

export { isElement, isNodeList };
