/**
 * Internationalization: french language
 * 
 * Depends on jWYSIWYG, $.wysiwyg.i18n
 *
 * By: Tom Barbette <mappam0@gmail.com>
 *
 */
(function($) {
if (undefined === $.wysiwyg) {
	throw "lang.fr.js depends on $.wysiwyg";
}
if (undefined === $.wysiwyg.i18n) {
	throw "lang.fr.js depends on $.wysiwyg.i18n";
}

$.wysiwyg.i18n.lang.fr = {
"Bold": "Gras",
"Copy": "Copier",
"Create link": "Créer un lien",
"Cut": "Couper",
"Decrease font size": "Diminuer la taille du texte",
"Header 1": "Titre 1",
"Header 2": "Titre 2",
"Header 3": "Titre 3",
"View source code": "Voir le code source",
"Increase font size": "Augmenter la taille du texte",
"Indent": "Augmenter le retrait",
"Insert Horizontal Rule": "Insérer une règle horyzontale",
"Insert image": "Insérer une image",
"Insert Ordered List": "Insérer une liste ordonnée",
"Insert table": "Insérer un tableau",
"Insert Unordered List": "Insérer une liste",
"Italic": "Italique",
"Justify Center": "Centré",
"Justify Full": "Justifié",
"Justify Left": "Aligné à gauche",
"Justify Right": "Aligné à droite",
"Left to Right": "Gauche à droite",
"Outdent": "Réduire le retrait",
"Paste": "Coller",
"Redo": "Restaurer",
"Remove formatting": "Supprimer le formatage",
"Right to Left": "Droite à gauche",
"Strike-through": "Barré",
"Subscript": "Indice",
"Superscript": "Exposant",
"Underline": "Souligné",
"Undo": "Annuler"
};

})(jQuery);