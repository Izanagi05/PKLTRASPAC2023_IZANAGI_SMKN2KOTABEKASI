<template>
  <div>
    <Header />
    <v-container>
      <v-btn @click="gnu">pp</v-btn>
      <v-row>
        <v-col lg="6">
          <div class="text-h5 font-weight-medium">Dari tanggal</div>
          <v-menu
            v-model="menu1"
            :close-on-content-click="false"
            :nudge-right="40"
            transition="scale-transition"
            offset-y
            min-width="auto"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="date1"
                label="Picker without buttons"
                prepend-icon="mdi-calendar"
                readonly
                v-bind="attrs"
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker
              v-model="date1"
              @input="menu2 = false"
            ></v-date-picker>
          </v-menu>
        </v-col>
        <v-col lg="6">
          <div class="text-h5 font-weight-medium">Sampai tanggal</div>
          <v-menu
            v-model="menu2"
            :close-on-content-click="false"
            :nudge-right="40"
            transition="scale-transition"
            offset-y
            min-width="auto"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="date2"
                label="Picker without buttons"
                prepend-icon="mdi-calendar"
                readonly
                v-bind="attrs"
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker
              v-model="date2"
              @input="menu2 = false"
            ></v-date-picker>
          </v-menu>
        </v-col>
      </v-row>
      <v-btn @click="settgl" color="#2196F3">set tanggal</v-btn>
      <v-select
      label="Select"
      v-model="berdasar"
      :items="berdasarkan"
      @input="set"
    ></v-select>
    </v-container>
    <div class="text-h5 font-weight-medium">Urutan</div>
    <v-select
      label="Select"
      v-model="pilihan"
      :items="items"
      @input="updateSelectedOption"
    ></v-select>
    <highchart :options="chartOptions" />
  </div>
</template>
<script>
import Header from "~/components/Header.vue";
import supabase from "~/plugins/supabase.js";
import axios from "axios";

export default {
  // middleware:"middlewareguest",
  data() {
    return {
      chartOptions: {},
      tess: null,
      datacatatan: [],
      pilihan: null,
      berdasar: null,
      kondisifilt: true,
      berdasarkan: ["Semua", "Bulan", "Tahun"],
      items: ["Asc", "Desc"],
      kkk: null,
      menu1: false,
      menu2: false,
      kondisi: -1,
      datacatatan2: [],
      datacttmap1: null,
      datacttmap2: null,
      valuedate: [],
      date1: new Date().toISOString().substr(0, 10),
      date2: new Date().toISOString().substr(0, 10),
    };
  },
  middleware: "middlewareguest",
  components: {
    Header,
  },
  async created() {
    this.pilihan = "Asc";
    await this.getdatacatatan("Semua");
    this.inisialisasidiagram();
  },
  methods: {
    updateSelectedOption(value) {
      this.pilihan = value;
      this.getdatacatatan();
      this.inisialisasidiagram()
    },
    async getdatacatatan(knd) {
      // const tg = "2023-08-24";
      if (this.kondisi == "Semua") {
        if (this.pilihan === "Asc") {
          const { data: datactt, error: errorall } = await supabase
            .from("vcatatan")
            .select("*")
            .order("tgl", { ascending: true });
            // axios
            // .get(
            //   "https://yykjftdovkjuvwgyzzig.supabase.co/functions/v1/hello-world",
            //   {
            //     headers: {
            //       Authorization: `Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Inl5a2pmdGRvdmtqdXZ3Z3l6emlnIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTA1MDkxMjMsImV4cCI6MjAwNjA4NTEyM30.QcnhrOvQTGUG9-BoS9Q0RI-M3c15X3Z4LqpZ5FtZAcg`,
            //     },
            //   }
            // )
            // .then((res) => {
            //   this.datacatatan2 = res?.data;
            // });
          this.datacatatan2 = datactt;
          console.log("1");
        } else {
          const { data: datactt, error: errorall } = await supabase
          .from("vcatatan")
          .select("*")
          .order("tgl", { ascending: false });

          this.datacatatan2 = datactt;
          // this.datacttmap1 = this.datacatatan2.map((item) => item.tgl);
          // this.datacttmap2 = this.datacatatan2.map((item) => item.jumlah);
          console.log("2");
        }
        this.datacttmap1 = this.datacatatan2.map((item) => item.tgl);
        this.datacttmap2 = this.datacatatan2.map((item) => item.jumlah);
      } else if (this.kondisi == "Bulan") {
        if (this.pilihan === "Asc") {
        const { data: datarange, error: errorrange } = await supabase
          .from("rangedtcatatan")
          .select("*")
          .gte("bulan", this.date1.substr(5, 2))
          .order("bulan", { ascending: true })
          .lte("bulan", this.date2.substr(5, 2));
          this.datacatatan2 = datarange;
        }else{
          const { data: datarange, error: errorrange } = await supabase
          .from("rangedtcatatan")
          .select("*")
          .gte("bulan", this.date1.substr(5, 2))
          .order("bulan", { ascending: false })
          .lte("bulan", this.date2.substr(5, 2));

          this.datacatatan2 = datarange;
        }
        // console.log(this.date1.substr(5, 2));
        this.datacttmap1 = this.datacatatan2.map((item) => item.bulan);
        this.datacttmap2 = this.datacatatan2.map((item) => item.jumlah);
      } else if ((this.kondisi === "Tahun")) {
        if (this.pilihan === "Asc") {

          const { data: datarangetahun, error: errorrange } = await supabase
          .from("rangetahun")
          .select("*").order("tahun", { ascending: true });
          this.datacttmap1 = datarangetahun.map((item) => item.tahun);
          this.datacttmap2 = datarangetahun.map((item) => item.total_jumlah);
        }else{
          const { data: datarangetahun, error: errorrange } = await supabase
          .from("rangetahun")
          .select("*").order("tahun", { ascending: false });
          this.datacttmap1 = datarangetahun.map((item) => item.tahun);
          this.datacttmap2 = datarangetahun.map((item) => item.total_jumlah);

          console.log(datarangetahun);
        }
      }
      this.inisialisasidiagram();
      console.log(this.datacatatan2);
    },
    // generateDataForMonth(year, month) {
    //   const data = [];
    //   const daysInMonth = new Date(year, month, 0).getDate();
    //   console.log(daysInMonth);
    //   for (let day = 1; day <= daysInMonth; day++) {
    //     const date = Date.UTC(year, month - 1, day);

    //     if (this.datacatatan2) {
    //       this.valuedate=5
    //     }else{
    //       this.valuedate=1
    //     }
    //     data.push([date, this.valuedate]);
    //   }
    //   this.tess = data;
    //   console.log(data)
    //   return data;
    // },
    gnu() {
      console.log(this.pilihan);
      this.getdatacatatan;
      this.inisialisasidiagram;
    },
    inisialisasidiagram() {
      this.chartOptions = {
        title: {
          text: "Grafik data catatan",
        },
        xAxis: {
          categories: this.datacttmap1,
        },
        yAxis: [
          {
            title: {
              text: "Jumlah data",
            },
          },
        ],
        series: [
          {
            type: "spline",
            name: "Jumlah data",
            data: this.datacttmap2,
          },
        ],
      };
    },
    tehss() {
      console.log(this.picker1.substr(6, 1));
      // this.inisialisasidiagram();
      this.menu = false;
      console.log(this.datacatatan2);
    },
    pickerm1() {
      console.log(this.picker1.substr(6, 1));
      // this.inisialisasidiagram();
      this.menu1 = false;
      console.log(this.datacatatan2);
    },
    pickerm2() {
      console.log(this.picker2.substr(6, 1));
      this.menu2 = false;
      console.log(this.datacatatan2);
    },
    set(value) {
      this.kondisi = value;
      this.getdatacatatan("Semua");
      this.inisialisasidiagram();
    },
    settgl(){
      this.getdatacatatan();
      this.inisialisasidiagram();
    }
  },
};
</script>

// Inisialisasi datacatatan2 dengan objek datacatatanByDate
// this.datacatatan2 = datacatatanByDate;

// this.datacatatan2 = this.kkk;
// Inisialisasi datacatatan2 dengan objek datacatatanByDate
// const { data: catataninmonth, error: errorbydate } = await supabase
// .from('catatan').select('*').eq('created_at::text', '%2023-08-24%');
// this.datacatatan = catataninmonth;

//         const datastr= datactt.map((item) => ({
  //   created_at: item.created_at.substr(0, 10)
  // }));
        // const tanggalArray = datastr.map((item) => item.created_at);
        // const tanggalCount = {};
        // tanggalArray.forEach((tanggal) => {
        //   if (tanggalCount[tanggal]) {
        //     tanggalCount[tanggal]++;
        //   } else {
        //     tanggalCount[tanggal] = 1;
        //   }
        // });

        // // const hasilAkhir = Object.keys(tanggalCount).map(
        // //   (tanggal) => tanggalCount[tanggal]
        // // );
        // const hasilAkhir = Object.keys(tanggalCount).map(tanggal => ({ tgl: tanggal, jum: tanggalCount[tanggal] }));
