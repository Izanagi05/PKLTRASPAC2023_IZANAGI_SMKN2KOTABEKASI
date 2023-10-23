import { serve } from "https://deno.land/std@0.106.0/http/server.ts";
// import { createClient } from "@supabase/supabase-js";
import { createClient } from "https://esm.sh/@supabase/supabase-js@2";
// import axios from "axios";
const supabaseUrl = "https://yykjftdovkjuvwgyzzig.supabase.co";
const supabaseURL = "https://yykjftdovkjuvwgyzzig.supabase.co/rest/v1";
const apiKey =
  "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Inl5a2pmdGRvdmtqdXZ3Z3l6emlnIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTA1MDkxMjMsImV4cCI6MjAwNjA4NTEyM30.QcnhrOvQTGUG9-BoS9Q0RI-M3c15X3Z4LqpZ5FtZAcg";
const supabase = createClient(supabaseUrl, apiKey);
let datacatatan: any;
let rangedata: any;
// let request: any;
let response: any;
const server = serve({ port: 8000 });

console.log("Server is running on port 8000");

for await (const request of server) {
  const { data, error } = await supabase
    .from("vcatatan")
    .select("*")
    .order("tgl");

  if (error) {
    request.respond({ status: 500, body: "Internal Server Error" });
  } else {
    const chartData = data.map((item) => ({
      date: item.tgl,
      count: item.jumlah,
    }));
    // for await (const request of server) {
    // axios
    //   .get(`${supabaseURL}/catatan?select=*`, {
    //     headers: {
    //       apikey: apiKey,
    //       Authorization: `Bearer ${apiKey}`,
    //     },
    //   })
    //   .then((res) => {
    //     datacatatan = res.data;
    //   });

    request.respond({
      status: 200,
      headers: {
        "Content-Type": "application/json",
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Headers":
          "authorization, x-client-info, apikey, content-type",
      },
      body: JSON.stringify(chartData),
    });
  }
}
