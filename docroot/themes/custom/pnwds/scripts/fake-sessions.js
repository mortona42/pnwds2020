const faker = require('faker/locale/en_US');
const fs = require('fs');
const path = require('path');

function getRandomTopics(arr, count) {
  let result = [];
  // Create a temp array
  let tmp = arr.slice();

  for (let i = 0; i < count; i++) {
    let index = Math.floor(Math.random() * tmp.length);
    // Remove one element from temp array at index
    let removed = tmp.splice(index, 1);
    result.push(removed[0]);
  }
  return result;
}

var topicsArray = new Array(
  "backend",
  "business",
  "development",
  "devops",
  "front end development",
  "human",
  "javascript",
  "performance",
  "project management",
  "site building",
  "ux"
);


function generateSessions() {
  let sessions = [];

  for (let id = 1; id <= 100; id++) {
    let title = faker.lorem.sentence();
    let description = faker.lorem.paragraphs(4);
    let date = faker.date.between('2020-03-28', '2020-03-30');
    let room = faker.random.number({ min: 100, max: 105 });
    let number = faker.random.number({
      'min': 1,
      'max': 5
    });
    let topics = getRandomTopics(topicsArray, number);
    let speaker = faker.name.findName();
    let jobTitle = faker.name.jobTitle();
    let company = faker.company.companyName();
    let photo = faker.image.avatar();
    let bio = faker.lorem.paragraphs();
    let link = faker.internet.url();


    sessions.push({
      id: id,
      title: title,
      description: "<p>" + description + "</p>",
      date: date,
      room: room,
      topics: topics,
      speaker: speaker,
      jobTitle: jobTitle,
      company: company,
      photo: photo,
      bio: bio,
      link: link
    });
  }

  return { sessions: sessions };
}

let dataObj = generateSessions();

fs.writeFileSync(path.join('source', '_data', 'sessions.json'),
  JSON.stringify(dataObj, null, '\t'));
