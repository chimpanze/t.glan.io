function initialState() {
    return {
        item: {
            id: null,
            name: null,
            context_key: null,
            project: null,
        },
        projectsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    projectsAll: state => state.projectsAll,
    
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

            axios.post('/api/v1/contexts', params)
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

            axios.post('/api/v1/contexts/' + state.item.id, params)
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
        axios.get('/api/v1/contexts/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchProjectsAll')
    },
    fetchProjectsAll({ commit }) {
        axios.get('/api/v1/projects')
            .then(response => {
                commit('setProjectsAll', response.data.data)
            })
    },
    setName({ commit }, value) {
        commit('setName', value)
    },
    setContext_key({ commit }, value) {
        commit('setContext_key', value)
    },
    setProject({ commit }, value) {
        commit('setProject', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setName(state, value) {
        state.item.name = value
    },
    setContext_key(state, value) {
        state.item.context_key = value
    },
    setProject(state, value) {
        state.item.project = value
    },
    setProjectsAll(state, value) {
        state.projectsAll = value
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
