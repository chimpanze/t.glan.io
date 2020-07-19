<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Language</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="Enter Name *"
                                            :value="item.name"
                                            @input="updateName"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="iso_code">Iso code *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="iso_code"
                                            placeholder="Enter Iso code *"
                                            :value="item.iso_code"
                                            @input="updateIso_code"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="project">Project *</label>
                                    <v-select
                                            name="project"
                                            label="name"
                                            @input="updateProject"
                                            :value="item.project"
                                            :options="projectsAll"
                                            />
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('LanguagesSingle', ['item', 'loading', 'projectsAll'])
    },
    created() {
        this.fetchProjectsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('LanguagesSingle', ['storeData', 'resetState', 'setName', 'setIso_code', 'setProject', 'fetchProjectsAll']),
        updateName(e) {
            this.setName(e.target.value)
        },
        updateIso_code(e) {
            this.setIso_code(e.target.value)
        },
        updateProject(value) {
            this.setProject(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'languages.index' })
                    this.$eventHub.$emit('create-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
