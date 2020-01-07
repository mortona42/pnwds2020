const faker = require('faker/locale/en_US');
const fs = require('fs');
const path = require('path');

function generateSponsors() {
  let sponsors = [];

  for (let id = 1; id <= 25; id++) {
    let companyName = faker.company.companyName();
    let logo = faker.image.abstract();


    sponsors.push({
      companyName: companyName,
      logo: logo
    });
  }

  return { sponsors: sponsors };
}

let dataObj = generateSponsors();

fs.writeFileSync(path.join('source', '_data', 'sponsors.json'),
  JSON.stringify(dataObj, null, '\t'));
