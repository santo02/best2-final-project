<template>
  <div>
    <Navbar />
    <div class="container">
      <div class="row mt-4">
        <div class="col">
          <h2> Daftar Perusahaan</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 offset-md-1" style="margin-left: 0px;">
            <div class="card m-auto" style="max-width: 850px;width: 902.7px;">
                <div class="card-body">
                    <form class="d-flex align-items-center">
                        <i class="fas fa-search d-none d-sm-block h4 text-body m-0" style="width: 47px;"></i>
                        <input class="form-control form-control-sm flex-shrink-1 form-control-borderless" type="search" placeholder="Search topics or keywords..." name="query">
                        <button class="btn btn-outline-primary" type="submit" style="margin-bottom: -6px;padding-top: 0.8px;padding-bottom: 0.8px;padding-right: 12px;padding-left: 13px;">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <div class="row mb-4">
        <div class="col-md-4 mt-4">
          <CardCompany/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardCompany from "./CardCompany.vue";
import axios from "axios";

export default {
  name: "Company",
  components: {
    CardCompany,
  },
  data() {
    return {
      Companys: [],
      search: '',
    };
  },
  methods: {
    setCompanys(data) {
      this.sompanys = data;
    },
    search() {
      axios
      .get(""+this.search)
      .then((response) => this.setCompanys(response.data))
      .catch((error) => console.log(error));
    }
  },
  mounted() {
    axios
      .get("")
      .then((response) => this.setCompanys(response.data))
      .catch((error) => console.log(error));
  },
};
</script>
<style>
</style>
