<template>
    <div>
        <header class="page-header">
  <div class="container">
    <h1>PROJECTS</h1>
	  <h6>Our diverse portfolio represents decades of construction experience.</h6>
	  <ul>
	  	<li><a href="#">HOME</a></li>
	  	<li>PROJECTS</li>
	  </ul>
  </div>
  <!-- end container --> 
</header>
<!-- end page-header -->
<section class="content-section ">
  <div class="container">
    <div class="row">
		<div class="col-12">
			<ul class="isotope-filter">
   			<li data-filter="*" class="current">ALL</li>
          	<li v-for="category in categories" :key="category.id" :data-filter="'.'+category.name">{{category.name}}</li>

   		</ul>
		</div>
		<!-- end col-12 -->
	  	<div class="col-12">
			<ul class="projects">
				<li v-for="project in projects" :key="project.id" :class="project.category">
				 <figure class="project-box"> <a href="/single-project"><img :src="'/images/projects/'+project.picture" alt="Image"></a>
          <figcaption>
            <h5>{{project.project_name}}</h5>
          </figcaption>
        </figure>
					<!-- end project-box -->
				</li>
				<!-- end li -->
				
			</ul>
		</div>
		<!-- end col-12 -->
	  </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
    </div>
</template>


<script>
export default {
    data () {
        return {
            categories: [],
            projects: []

        }
    },
    created() {

        axios.post('/admin/projectcategory/categorydata').then(response => {
                let data = response.data;
                this.categories = data
        });

        axios.post('/admin/project/projectdata').then(response => {
                let data = response.data;
                this.projects = data
                console.log()
        });

       
    }

}
</script>