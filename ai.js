
const OpenAI = require("openai");

const openai = new OpenAI();

async function requestLinkedin(title, content) {
  const completion = await openai.chat.completions.create({
    messages: [{ role: 'system', content: 'I am seeking a freelancer to help me create a simple "mad-libs word game" webpage. Languages will be used: HTML, CSS, and Javascript. Examples; https://gr2m.github.io/Mad-Libs-Forms/ https://www.madtakes.com/libs/187.html I will share the details once you bid.' }],
    model: "gpt-3.5-turbo",
  });
  console.log("linkedin post: " + completion?.choices[0]?.message?.content);
  return completion?.choices[0]?.message?.content;
}
const content = requestLinkedin("Why this happened?", "I tried the same logic in my node backend and a single node file but the result is different.");

// cmd: SET OPENAI_API_KEY=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