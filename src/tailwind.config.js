/**
 * Tailwind CSS configuration file
 *
 * docs: https://tailwindcss.com/docs/configuration
 * default: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
 */
const path = require('path')

module.exports = {
  theme: {

    extend: { 

      colors: {
       "primary" : "#189E81",
       "secondary" : "#1fcaa5"
      },
      maxWidth: {
        "workspace": "778.5px",
        "comunidad" : "866px",
        "content": "866px",
        "alimentacion": "902px",
        "emprendimientos" : "902px",
        "bienestar" : "902px",
        "educacion": "902px",
        "hospitality": "902px"
      },
      backgroundImage : {
        "espacios-de-trabajo" : "linear-gradient(57.15deg, rgba(0, 0, 0, 0.69) 28.99%, rgba(0, 0, 0, 0.15) 66.29%, rgba(0, 0, 0, 0) 86.14%);",
        "comunidad" : "linear-gradient(57.15deg, rgba(0, 0, 0, 0.69) 28.99%, rgba(0, 0, 0, 0.15) 66.29%, rgba(0, 0, 0, 0) 86.14%);"
      }

    
    }

  },
  content: [
    path.resolve(__dirname, '**/*.{js,vue}'),
    path.resolve(__dirname, '../*.php'),
    path.resolve(__dirname, '../**/*.php'),
    path.resolve("./css/**/*.scss")
  ]
}