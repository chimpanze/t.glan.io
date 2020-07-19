import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import ProjectsIndex from './modules/Projects'
import ProjectsSingle from './modules/Projects/single'
import LanguagesIndex from './modules/Languages'
import LanguagesSingle from './modules/Languages/single'
import ContextsIndex from './modules/Contexts'
import ContextsSingle from './modules/Contexts/single'
import StringsIndex from './modules/Strings'
import StringsSingle from './modules/Strings/single'
import TranslationsIndex from './modules/Translations'
import TranslationsSingle from './modules/Translations/single'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        ProjectsIndex,
        ProjectsSingle,
        LanguagesIndex,
        LanguagesSingle,
        ContextsIndex,
        ContextsSingle,
        StringsIndex,
        StringsSingle,
        TranslationsIndex,
        TranslationsSingle,
        PermissionsIndex,
        PermissionsSingle,
        RolesIndex,
        RolesSingle,
        UsersIndex,
        UsersSingle,
    },
    strict: debug,
})
