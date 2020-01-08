var sassMapToJson = require('sass-maps-to-json');
var settings = {
  "src": "./source/css/sass/generic/_variables.scss",
  "dest": "./source/_data/variables.json"
};
sassMapToJson(settings);
