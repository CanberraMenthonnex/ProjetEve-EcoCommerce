module.exports = {
  bundles: [
    {
      name: 'editor',
      scripts: ['./public/js/editor.js'],
      vendor: ['./node_modules/@editorjs/*/dist/*.js', './public/js/lib/simple-image.js']
    },

    {
      name: 'review',
      scripts: ['./public/js/ajax-review.js'],
      vendor: []
    }
    
  ]

  };