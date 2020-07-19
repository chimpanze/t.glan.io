<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Translation</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">View</h3>
                        </div>

                        <div class="box-body">
                            <back-buttton></back-buttton>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>#</th>
                                            <td>{{ item.id }}</td>
                                        </tr>
                                        <tr>
                                            <th>String</th>
                                            <td>
                                                <span class="label label-info" v-if="item.string !== null">
                                                    {{ item.string.key }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Language</th>
                                            <td>
                                                <span class="label label-info" v-if="item.language !== null">
                                                    {{ item.language.name }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Context</th>
                                            <td>
                                                <span class="label label-info" v-if="item.context !== null">
                                                    {{ item.context.name }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Translation</th>
                                            <td v-html="item.translation"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('TranslationsSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('TranslationsSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
