import { Telegraf, Context, session } from "telegraf";
import { message } from "telegraf/filters";
import axios from "axios";
import { createClient } from "@supabase/supabase-js";
const supabaseURL = "https://yykjftdovkjuvwgyzzig.supabase.co/rest/v1";
const apiKey =
  "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Inl5a2pmdGRvdmtqdXZ3Z3l6emlnIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTA1MDkxMjMsImV4cCI6MjAwNjA4NTEyM30.QcnhrOvQTGUG9-BoS9Q0RI-M3c15X3Z4LqpZ5FtZAcg";
let datacatatan: any;
let rangedata: any;
let response: any;
let urlimage: string =
  "https://yykjftdovkjuvwgyzzig.supabase.co/storage/v1/object/public/image-catatan/";
const supabase = createClient(supabaseURL, apiKey);

axios
  .get(`${supabaseURL}/catatan?select=*`, {
    headers: {
      apikey: apiKey,
      Authorization: `Bearer ${apiKey}`,
    },
  })
  .then((res) => {
    datacatatan = res.data;
  });
const BOT_TOKEN = "6368375326:AAF7xBuyLZ3MYOaObdguTx0kBM-I5dRlQp0";

//login 2 =sbp_7b656418ddcda1c18d2b589d0c10c825ae20dc28
// https://api.telegram.org/bot6368375326:AAF7xBuyLZ3MYOaObdguTx0kBM-I5dRlQp0/setWebhook?url=https://yykjftdovkjuvwgyzzig.supabase.co/functions/v1/bot-telegram

const bot = new Telegraf(BOT_TOKEN);
// bot.use(session());
bot.start((ctx: Context) =>
  ctx.reply(
    "pilih data berdasarkan apa yang ingin di tampilkan\n /tahun & /bulan atau /semua"
  )
);
bot.hears("/semua", (ctx) => {
  let rangemessage = "Ini data berdasarkan tahun";
  try {
    axios
      .get(`${supabaseURL}/vcatatan?select=*`, {
        headers: {
          apikey: apiKey,
          Authorization: `Bearer ${apiKey}`,
        },
      })
      .then((res) => {
        rangedata = res.data;
      });
    if (rangedata) {
      rangedata.forEach((itemku, index) => {
        rangemessage += `\n DATA ke-${index + 1}:\n`;
        rangemessage += `Jumlah: ${itemku.jumlah}\n`;
        rangemessage += `Tanggal: ${itemku.tgl}\n`;
        // rangemessage += `\n Bulan ke-${index + 1}:\n`;
      });
      ctx.reply(rangemessage);
    }
  } catch (error) {
    console.error("Terjadi kesalahan:" + error, error);
    ctx.reply("Terjadi kesalahan saat mengambil data." + error);
  }
});
bot.hears(/^\/bulan (\d+) (\d+)$/, async (ctx) => {
  const startMonth = parseInt(ctx.match[1]);
  const endMonth = parseInt(ctx.match[2]);
  let rangemessage = `Ini data berdasarkan bulan dari bulan ${startMonth} hingga ${endMonth}`;
  try {
    response = await axios.get(
      `${supabaseURL}/rangedtcatatan?bulan=gte.${startMonth}&bulan=lte.${endMonth}&select=*`,
      {
        headers: {
          apikey: apiKey,
          Authorization: `Bearer ${apiKey}`,
        },
      }
    );
    const rangedata = response.data;
    if (rangedata) {
      rangedata.forEach((itemku, index) => {
        rangemessage += `\n DATA ke-${index + 1}:\n`;
        rangemessage += `Bulan: ${itemku.bulan}\n`;
        rangemessage += `Tahun: ${itemku.tahun}\n`;
        rangemessage += `Jumlah: ${itemku.jumlah}\n`;
      });
      ctx.reply(rangemessage);
    }
  } catch (error) {
    console.error(
      "Terjadi kesalahan: format harus /bulan <angka1> <angka2>" + error,
      error
    );
    ctx.reply("Terjadi kesalahan saat mengambil data." + error);
  }
});
bot.hears("/bulan", async (ctx) => {
  let rangemessage = `Ini data berdasarkan bulan`;
  try {
    response = await axios.get(`${supabaseURL}/rangedtcatatan?select=*`, {
      headers: {
        apikey: apiKey,
        Authorization: `Bearer ${apiKey}`,
      },
    });
    const rangedata = response.data;

    if (rangedata) {
      rangedata.forEach((itemku, index) => {
        rangemessage += `\n DATA ke-${index + 1}:\n`;
        rangemessage += `Bulan: ${itemku.bulan}\n`;
        rangemessage += `Tahun: ${itemku.tahun}\n`;
        rangemessage += `Jumlah: ${itemku.jumlah}\n`;
      });

      ctx.reply(rangemessage);
    }
  } catch (error) {
    console.error(
      "Terjadi kesalahan: format harus /bulan" + error,
      error
    );
    ctx.reply("Terjadi kesalahan saat mengambil data." + error);
  }
});
bot.hears(/^\/tahun (\d+) (\d+)$/, async (ctx) => {
  const startMonth = parseInt(ctx.match[1]);
  const endMonth = parseInt(ctx.match[2]);
  let rangemessage = `Ini data berdasarkan bulan dari bulan ${startMonth} hingga ${endMonth}`;
  try {
    response = await axios.get(
      `${supabaseURL}/rangetahun?tahun=gte.${startMonth}&tahun=lte.${endMonth}&select=*`,
      {
        headers: {
          apikey: apiKey,
          Authorization: `Bearer ${apiKey}`,
        },
      }
    );
    const rangedata = response.data;
    if (rangedata) {
      rangedata.forEach((itemku, index) => {
        rangemessage += `\n DATA ke-${index + 1}:\n`; 
        rangemessage += `Tahun: ${itemku.tahun}\n`;
        rangemessage += `Jumlah: ${itemku.total_jumlah}\n`;
      });
      ctx.reply(rangemessage);
    }
  } catch (error) {
    console.error(
      "Terjadi kesalahan: format harus /tahun <angka1> <angka2>" + error,
      error
    );
    ctx.reply("Terjadi kesalahan saat mengambil data." + error);
  }
});
bot.hears("/tahun", async (ctx) => {
  let rangemessage = `Ini data berdasarkan tahun`;
  try {
    response = await axios.get(`${supabaseURL}/rangetahun?select=*`, {
      headers: {
        apikey: apiKey,
        Authorization: `Bearer ${apiKey}`,
      },
    });
    const rangedata = response.data;

    if (rangedata) {
      rangedata.forEach((itemku, index) => {
        rangemessage += `\n DATA ke-${index + 1}:\n`; 
        rangemessage += `Tahun: ${itemku.tahun}\n`;
        rangemessage += `Jumlah: ${itemku.total_jumlah}\n`;
      });

      ctx.reply(rangemessage);
    }
  } catch (error) {
    console.error(
      "Terjadi kesalahan: format harus /tahun" + error,
      error
    );
    ctx.reply("Terjadi kesalahan saat mengambil data." + error);
  }
});

bot.hears("/ya", (ctx) => {
  if (Array.isArray(datacatatan) && datacatatan.length > 0) {
    let message =
      "Selamat! Sekarang kamu adalah MC di anime \n Pilih Genre \n /romen atau /harem!\n";

    datacatatan.forEach((catatan, index) => {
      message += `\nCatatan ke-${index + 1}:\n`;
      message += `Judul: ${catatan.judul}\n`;
      message += `Isi: ${catatan.isi}\n`;
      message += `Tanggal Dibuat: ${catatan.created_at}\n`;
      message += `Tanggal Diperbarui: ${catatan.updated_at}\n`;
    });
    
    ctx.reply(message);
  } else {
    ctx.reply("Data catatan tidak tersedia.");
  }
});

// bot.help((ctx: Context) => ctx.reply("Pilih salah satu opsi opsi "));
// bot.command("oldschool", (ctx: Context) => ctx.reply("Hello"));
// bot.on("sticker", (ctx: Context) => ctx.reply("👍"));
// bot.hears("hi", (ctx: Context) => ctx.reply("Hey there"));

bot.launch();
// bot.launch({
//   webhook: {
//     domain: 'https://yykjftdovkjuvwgyzzig.supabase.co/functions/v1/bot-telegram',
//     hookPath: '/bot-telegram', // Ganti sesuai kebutuhan Anda
//     port: 8000, // Port Deno server Anda
//   },
// });
console.log("Hello from Functions!");

// serve(async (req) => {
//   const { name } = await req.json()
//   const data = {
//     message: `Hello ${name}!`,
//   }})

// // Enable graceful stop
// process.once('SIGINT', () => bot.stop('SIGINT'));
// process.once('SIGTERM', () => bot.stop('SIGTERM'));b
