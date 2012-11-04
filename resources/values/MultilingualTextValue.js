/**
 * @file
 * @ingroup DataValues
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 * @author Daniel Werner
 */
( function( dv, $, undefined ) {
'use strict';

var PARENT = dv.DataValue,
	constructor = function( monoLingualValues ) {
		this._texts = monoLingualValues;
	};

/**
 * Constructor for creating a multilingual text value. A multilingual text is a collection of
 * monolingual text values with the same meaning in different languages.
 *
 * @constructor
 * @extends dv.DataValue
 * @since 0.1
 *
 * @param {dv.MonolingualTextValue[]} monoLingualValues
 */
dv.MultilingualTextValue = dv.util.inherit( PARENT, constructor, {

	/**
	 * @see dv.DataValue.getType
	 *
	 * @since 0.1
	 *
	 * @return String
	 */
	getType: function() {
		return 'multilingualtext';
	},

	/**
	 * @see dv.DataValue.getSortKey
	 *
	 * @since 0.1
	 *
	 * @return String
	 */
	getSortKey: function() {
		return this._texts.length < 1 ? '' : this._texts[0].getSortKey();
	},

	/**
	 * @see dv.DataValue.getValue
	 *
	 * @since 0.1
	 *
	 * @return mixed
	 */
	getValue: function() {
		return this;
	},

	/**
	 * @see dv.DataValue.equals
	 *
	 * @since 0.1
	 */
	equals: function( value ) {
		if ( !( value instanceof dv.MultilingualTextValue ) ) {
			return false;
		}

		var a = this.toJSON(),
			b = value.toJSON();

		return !( a > b || b < a );
	},

	/**
	 * @see dv.DataValue.toJSON
	 *
	 * @since 0.1
	 *
	 * @return Object
	 */
	toJSON: function() {
		var texts = [];

		for ( var i in this._texts ) {
			texts[this._texts[i].getLanguageCode()] = this._texts[i].getText();
		}

		return texts;
	},

	/**
	 * Returns the text in all languages available.
	 *
	 * @since 0.1
	 *
	 * @return Array
	 */
	getTexts: function() {
		return this._texts;
	}

} );

}( dataValues, jQuery ) );