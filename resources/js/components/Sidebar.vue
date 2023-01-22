<template>
  <div>
    <div class="card p-0 m-0">
      <div class="card-body p-3">
        <div class="d-flex align-items-center small mb-0">
          <i class="fas fa-search mr-1"></i>
          <strong>Refine Sua Busca</strong>
        </div>
        <a
          href="#"
          class="job-filter d-md-none d-none"
          data-toggle="collapse"
          data-target="#accordion"
          aria-expanded="true"
          aria-controls="accordion"
        >
          <i class="icon icon-list"></i> Filter
        </a>
      </div>
    </div>
    <div id="accordion">
      <div class="card border-top-0">
        <div class="card-body p-3" id="jobCategories">
          <div class="pb-0">
            <div class="card-title mb-1">Categorias de emprego</div>
            <div class="card-body p-0">
              <div class="form-group">
                <select
                  name="job_category"
                  class="form-control"
                  placeholder="Filtre Por Categoria"
                  @change="filterCategory($event)"
                >
                  <option disabled selected value>
                    -- selecione uma opção --
                  </option>
                  <option
                    v-for="category in categories"
                    :value="category.id"
                    :key="category.id"
                  >
                    {{ category.category_name }}
                  </option>
                </select>
              </div>
            </div>
          </div>
          <hr class="my-3" />
          <div class="pb-0">
            <div class="card-title mb-1">Nível</div>
            <div class="card-body p-0">
              <div class="form-group">
                <select
                  name="job_category"
                  class="form-control"
                  placeholder="Filtre Por Categoria"
                  @change="filterJobLevel($event)"
                >
                  <option disabled selected value>
                    -- selecione uma opção --
                  </option>
                  <option value="Senior">Senior</option>
                  <option value="Pleno">Pleno</option>
                  <option value="Junior">Junior</option>
                  <option value="Estágio">Estágio</option>
                </select>
              </div>
            </div>
          </div>
          <hr class="my-3" />
          <div class="pb-0">
            <div class="card-title mb-1">Tipo da vaga</div>
            <div class="card-body p-0">
              <div class="form-group">
                <select
                  name="job_category"
                  class="form-control"
                  placeholder="Filtre Por Categoria"
                  @change="filterEmploymentType($event)"
                >
                  <option disabled selected value>
                    -- selecione uma opção --
                  </option>
                  <option value="Integral">Integral</option>
                  <option value="Parcial">Parcial</option>
                  <option value="Freelance">Freelance</option>
                  <option value="Estágio">Estágio</option>
                  <option value="Treinee">Treinee</option>
                  <option value="Voluntário">Voluntário</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "sidebar-component",
  data() {
    return {
      categories: [],
    };
  },
  mounted() {
    this.setCategoies();
  },
  methods: {
    setCategoies() {
      axios
        .get("/api/company-categories")
        .then((res) => res.data)
        .then((data) => {
          this.categories = JSON.parse(JSON.stringify(data));
        });
    },
    filterCategory(e) {
      this.$emit("get-by-category", e.target.value);
    },
    filterEmploymentType(e) {
      this.$emit("get-by-employmentType", e.target.value);
    },
    filterEducation(e) {
      this.$emit("get-by-education", e.target.value);
    },
    filterJobLevel(e) {
      this.$emit("get-by-job-level", e.target.value);
    },
  },
};
</script>

<style>
</style>