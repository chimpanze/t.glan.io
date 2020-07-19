function initialState() {
    return {
        item: {
            id: null,
            key: null,
            description: null,
            placholder_configuration: null,
            project: null,
            context: null,
        },
        projectsAll: [],
        contextsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    projectsAll: state => state.projectsAll,
    contextsAll: state => state.contextsAll,
    
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.project)) {
                params.set('project_id', '')
            } else {
                params.set('project_id', state.item.project.id)
            }
            if (_.isEmpty(state.item.context)) {
                params.set('context_id', '')
            } else {
                params.set('context_id', state.item.context.id)
            }

            axios.post('/api/v1/strings', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.project)) {
                params.set('project_id', '')
            } else {
                params.set('project_id', state.item.project.id)
            }
            if (_.isEmpty(state.item.context)) {
                params.set('context_id', '')
            } else {
                params.set('context_id', state.item.context.id)
            }

            axios.post('/api/v1/strings/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/strings/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchProjectsAll')
    dispatch('fetchContextsAll')
    },
    fetchProjectsAll({ commit }) {
        axios.get('/api/v1/projects')
            .then(response => {
                commit('setProjectsAll', response.data.data)
            })
    },
    fetchContextsAll({ commit }) {
        axios.get('/api/v1/contexts')
            .then(response => {
                commit('setContextsAll', response.data.data)
            })
    },
    setKey({ commit }, value) {
        commit('setKey', value)
    },
    setDescription({ commit }, value) {
        commit('setDescription', value)
    },
    setPlacholder_configuration({ commit }, value) {
        commit('setPlacholder_configuration', value)
    },
    setProject({ commit }, value) {
        commit('setProject', value)
    },
    setContext({ commit }, value) {
        commit('setContext', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setKey(state, value) {
        state.item.key = value
    },
    setDescription(state, value) {
        state.item.description = value
    },
    setPlacholder_configuration(state, value) {
        state.item.placholder_configuration = value
    },
    setProject(state, value) {
        state.item.project = value
    },
    setContext(state, value) {
        state.item.context = value
    },
    setProjectsAll(state, value) {
        state.projectsAll = value
    },
    setContextsAll(state, value) {
        state.contextsAll = value
    },
    
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
