<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Translation</h1>
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
                                    <label for="string">String *</label>
                                    <v-select
                                            name="string"
                                            label="key"
                                            @input="updateString"
                                            :value="item.string"
                                            :options="stringsAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="language">Language *</label>
                                    <v-select
                                            name="language"
                                            label="name"
                                            @input="updateLanguage"
                                            :value="item.language"
                                            :options="languagesAll"
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
                                <div class="form-group">
                                    <label for="translation">Translation *</label>
                                    <vue-ckeditor
                                            name="translation"
                                            :id="'translation'"
                                            :value="item.translation"
                                            @input="updateTranslation"
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
        ...mapGetters('TranslationsSingle', ['item', 'loading', 'stringsAll', 'languagesAll', 'contextsAll'])
    },
    created() {
        this.fetchStringsAll(),
        this.fetchLanguagesAll(),
        this.fetchContextsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('TranslationsSingle', ['storeData', 'resetState', 'setString', 'setLanguage', 'setContext', 'setTranslation', 'fetchStringsAll', 'fetchLanguagesAll', 'fetchContextsAll']),
        updateString(value) {
            this.setString(value)
        },
        updateLanguage(value) {
            this.setLanguage(value)
        },
        updateContext(value) {
            this.setContext(value)
        },
        updateTranslation(value) {
            this.setTranslation(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'translations.index' })
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
