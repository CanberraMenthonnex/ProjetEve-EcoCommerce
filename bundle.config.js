module.exports = {
  bundles: [
    {
      name: 'editor',
      scripts: ['./public/js/src/editor.js'],
      vendor: ['./node_modules/@editorjs/*/dist/*.js', './public/js/src/lib/simple-image.js']
    },

    {
      name: 'review',
      scripts: ['./public/js/src/ajax-review.js'],
      vendor: []
    },
    {
      name: 'verify',
      scripts: ['./public/js/src/ajax-verify.js'],
      vendor: []
    },
    {
      name: 'creation-article',
      scripts: ['./public/js/src/custom-elements/file-reader-input.js', './public/js/src/creation-article.js'],
      vendor: []
    },
    {
      name: "template",
      scripts: ['./public/js/src/ajax-cart.js', './public/js/src/header.js', "./public/js/src/alert.js"],
      vendor: []
    }
  ]

  };