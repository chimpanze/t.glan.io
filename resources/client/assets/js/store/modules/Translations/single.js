function initialState() {
    return {
        item: {
            id: null,
            string: null,
            language: null,
            context: null,
            translation: null,
        },
        stringsAll: [],
        languagesAll: [],
        contextsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    stringsAll: state => state.stringsAll,
    languagesAll: state => state.languagesAll,
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

            if (_.isEmpty(state.item.string)) {
                params.set('string_id', '')
            } else {
                params.set('string_id', state.item.string.id)
            }
            if (_.isEmpty(state.item.language)) {
                params.set('language_id', '')
            } else {
                params.set('language_id', state.item.language.id)
            }
            if (_.isEmpty(state.item.context)) {
                params.set('context_id', '')
            } else {
                params.set('context_id', state.item.context.id)
            }

            axios.post('/api/v1/translations', params)
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

            if (_.isEmpty(state.item.string)) {
                params.set('string_id', '')
            } else {
                params.set('string_id', state.item.string.id)
            }
            if (_.isEmpty(state.item.language)) {
                params.set('language_id', '')
            } else {
                params.set('language_id', state.item.language.id)
            }
            if (_.isEmpty(state.item.context)) {
                params.set('context_id', '')
            } else {
                params.set('context_id', state.item.context.id)
            }

            axios.post('/api/v1/translations/' + state.item.id, params)
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
        axios.get('/api/v1/translations/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchStringsAll')
    dispatch('fetchLanguagesAll')
    dispatch('fetchContextsAll')
    },
    fetchStringsAll({ commit }) {
        axios.get('/api/v1/strings')
            .then(response => {
                commit('setStringsAll', response.data.data)
            })
    },
    fetchLanguagesAll({ commit }) {
        axios.get('/api/v1/languages')
            .then(response => {
                commit('setLanguagesAll', response.data.data)
            })
    },
    fetchContextsAll({ commit }) {
        axios.get('/api/v1/contexts')
            .then(response => {
                commit('setContextsAll', response.data.data)
            })
    },
    setString({ commit }, value) {
        commit('setString', value)
    },
    setLanguage({ commit }, value) {
        commit('setLanguage', value)
    },
    setContext({ commit }, value) {
        commit('setContext', value)
    },
    setTranslation({ commit }, value) {
        commit('setTranslation', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setString(state, value) {
        state.item.string = value
    },
    setLanguage(state, value) {
        state.item.language = value
    },
    setContext(state, value) {
        state.item.context = value
    },
    setTranslation(state, value) {
        state.item.translation = value
    },
    setStringsAll(state, value) {
        state.stringsAll = value
    },
    setLanguagesAll(state, value) {
        state.languagesAll = value
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
