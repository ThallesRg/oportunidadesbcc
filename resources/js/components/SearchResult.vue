<template>
  <div class="search-result">
    <div class="card mt-md-0 mt-3">
      <div class="card-body row p-3">
        <div class="col-6">
          <h1 class="h6" id="job-count">
            Exibindo {{ from }} - {{ to }} vagas de {{ total }}
          </h1>
        </div>
        <div class="col-6">
          <ul class="nav nav-inline float-right">
            <li class="nav-item mr-3">
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="posts">
      <div class="card mt-3 hover-shadow" v-for="post in posts" :key="post.id">
        <div class="card-body">
          <div class="col-sm-12 col-md-12 col-12 col-lg-12">
            <div class="row align-items-center text-center text-lg-left">
              <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 pt-2 mx-auto">
                <img class="border p-2 img-fluid" :src="`/${post.company.logo}`" width="100px" />
              </div>
              <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 pl-0 pl-md-2 pb-2">
                <h5 class="secondary-link font-weight-bold">
                  <a :href="`/job/${post.id}-${post.job_title}`" target="_blank">
                    {{ post.job_title }}
                  </a>
                </h5>
                <h6 class="mt-2">
                  <a :href="`/employer/${post.company.id}-${post.company.title}`" target="_blank" class="text-dark">
                    {{ post.company.title }}
                  </a>
                </h6>

                <div class="small my-1">
                  <span>Endereço: </span>
                  <span>{{ post.job_location }}</span>
                </div>

                <div class="small">
                  <span class="text-muted">Habilidades:</span>
                  <span class="text-info">
                    {{ post.skills }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer py-2">
          <div class="d-inline">
            <span class="text-muted">
              <i class="fas fa-clock"></i> Aplique até:
              {{ post.deadline.slice(8,10) + '/' + post.deadline.slice(5,7) + '/' + post.deadline.slice(0,4) }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "searchResult",
  props: ["posts", "from", "to", "total"],
};
</script>

<style>

</style>