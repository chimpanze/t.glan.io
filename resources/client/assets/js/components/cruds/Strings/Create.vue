<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>String</h1>
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
                                    <label for="key">Key *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="key"
                                            placeholder="Enter Key *"
                                            :value="item.key"
                                            @input="updateKey"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="description">Description *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="description"
                                            placeholder="Enter Description *"
                                            :value="item.description"
                                            @input="updateDescription"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="placholder_configuration">Placholder configuration</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="placholder_configuration"
                                            placeholder="Enter Placholder configuration"
                                            :value="item.placholder_configuration"
                                            @input="updatePlacholder_configuration"
                                            >
                                    </textarea>
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
                                <div class="form-group">
                                    <label for="context">Context *</label>
                                    <v-select
                                            name="context"
                                            label="name"
                                            @input="updateContext"
                                            :value="item.context"
                                            :options="contextsAll"
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
        ...mapGetters('StringsSingle', ['item', 'loading', 'projectsAll', 'contextsAll'])
    },
    created() {
        this.fetchProjectsAll(),
        this.fetchContextsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('StringsSingle', ['storeData', 'resetState', 'setKey', 'setDescription', 'setPlacholder_configuration', 'setProject', 'setContext', 'fetchProjectsAll', 'fetchContextsAll']),
        updateKey(e) {
            this.setKey(e.target.value)
        },
        updateDescription(e) {
            this.setDescription(e.target.value)
        },
        updatePlacholder_configuration(e) {
            this.setPlacholder_configuration(e.target.value)
        },
        updateProject(value) {
            this.setProject(value)
        },
        updateContext(value) {
            this.setContext(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'strings.index' })
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
