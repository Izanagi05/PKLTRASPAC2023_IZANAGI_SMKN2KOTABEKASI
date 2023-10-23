import { Telegraf, Context } from 'telegraf';
import { message } from 'telegraf/filters';

const BOT_TOKEN = '6368375326:AAF7xBuyLZ3MYOaObdguTx0kBM-I5dRlQp0';
// import {serve} from 'https://deno.land/std@0.168.0/http/server.ts';
// console.log("Hello from Functions!")

// serve(async (req) => {
//   const  name  ='iza'
//   const data = {
//     message: `Hello ${name}!`,
//   }

//   return new Response(
//     JSON.stringify(data),
//     { headers: { "Content-Type": "application/json" } },
//   )
// })

// import {serve} from 'https://deno.land/std@0.168.0/http/server.ts';
// console.log(BOT_TOKEN)

// if (!BOT_TOKEN) {
//   console.error('Bot token is missing in the environment variables.');
//   Deno.exit(1);
// }
//login 2 =sbp_7b656418ddcda1c18d2b589d0c10c825ae20dc28
// https://api.telegram.org/bot6368375326:AAF7xBuyLZ3MYOaObdguTx0kBM-I5dRlQp0/setWebhook?url=https://yykjftdovkjuvwgyzzig.supabase.co/functions/v1/bot-telegram

const bot = new Telegraf(BOT_TOKEN);

bot.start((ctx: Context) => ctx.reply('hai apakah kamu mau jadi anime?\n /ya atau /tidak'));
bot.hears('/ya', (ctx) => {
  ctx.reply('Selamat! Sekarang kamu adalah MC di anime \n Pilih Genre \n /romen atau /harem!');
});
bot.hears('/romen', (ctx) => {
  ctx.reply('kamu kan npc');
});
bot.hears('/harem', (ctx) => {
  ctx.reply('bjir amat');
});

bot.hears('/tidak', (ctx) => {
  ctx.reply('Oke, kamu tetap hebat!');
});
bot.help((ctx: Context) => ctx.reply('Pilih salah satu opsi opsi '));
bot.command('oldschool', (ctx: Context) => ctx.reply('Hello'))
bot.on('sticker', (ctx: Context) => ctx.reply('👍'));
bot.hears('hi', (ctx: Context) => ctx.reply('Hey there'));

bot.launch();
console.log("Hello from Functions!")

// serve(async (req) => {
//   const { name } = await req.json()
//   const data = {
//     message: `Hello ${name}!`,
//   }})

// // Enable graceful stop
// process.once('SIGINT', () => bot.stop('SIGINT'));
// process.once('SIGTERM', () => bot.stop('SIGTERM'));
