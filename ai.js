const OpenAI = require("openai");

const openai = new OpenAI();

async function requestLinkedin(title, jobDetails, instructions) {
  const completion = await openai.chat.completions.create({
    messages: [
      { role: 'system', content: instructions }, // Instructions for the AI
      { role: 'user', content: title },
      { role: 'system', content: jobDetails }
    ],
    model: "gpt-3.5-turbo",
  });
  // console.log(completion?.choices[0]?.message?.content);
  const result = completion?.choices[0]?.message?.content;
  return result;
}
async function main() {
// Example usage
const instructions = `The GPT will craft job proposals in English, regardless of the original language of the client's job description. Please provide a brief sample bid, consisting of only 5-7 short sentences. It should highlight a technical problem, my experience, and the solution I offer for the project. The bid should start with "Hello". Kindly provide 2-5 very short sample questions related to the project. Ensure the questions address the technical problem. The project proposal should not touch on timelines or budgets. I'd like to suggest to the client that we communicate for further discussions on the project. Please separate the sections as "Bid" and "Question." Each sentence in the question should be on a separate line.eate a proposal for a web development project based on the provided job details.`;
const title = `Web Development Project Proposal`;
const jobDetails = `I am seeking a freelancer to help me create a simple 'mad-libs word game' webpage. Languages will be used: HTML, CSS, and Javascript. Examples; https://gr2m.github.io/Mad-Libs-Forms/ https://www.madtakes.com/libs/187.html I will share the details once you bid.`;
const content = await requestLinkedin(title, jobDetails, instructions);
console.log(content);
}
main();

// You can find your API key at https://platform.openai.com/account/api-keys.