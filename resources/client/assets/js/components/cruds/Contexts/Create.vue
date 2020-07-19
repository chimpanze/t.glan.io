<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Context</h1>
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
                                    <label for="context_key">Context key *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="context_key"
                                            placeholder="Enter Context key *"
                                            :value="item.context_key"
                                            @input="updateContext_key"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="project">Project id *</label>
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
        ...mapGetters('ContextsSingle', ['item', 'loading', 'projectsAll'])
    },
    created() {
        this.fetchProjectsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('ContextsSingle', ['storeData', 'resetState', 'setName', 'setContext_key', 'setProject', 'fetchProjectsAll']),
        updateName(e) {
            this.setName(e.target.value)
        },
        updateContext_key(e) {
            this.setContext_key(e.target.value)
        },
        updateProject(value) {
            this.setProject(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'contexts.index' })
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
