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
       "primary" : "#0079B5",
       "secondary" : "#0C0C0C",
       "green" : "#259452",
      }

    },
    screens: {
      'sm': '480px',
      'sm2': '580px',
      'md': '768px',
      'md2': '980px',
      'lg': '1024px',
      'lg2': '1120px',
      'xl': '1280px',
      'footer': '1362px',
      'desk': '1440px',
      '2xl': '1536px'
    },

  },
  content: [
    path.resolve(__dirname, '**/*.{js,vue}'),
    path.resolve(__dirname, '../*.php'),
    path.resolve(__dirname, '../**/*.php'),
    path.resolve("./css/**/*.scss")
  ]
}