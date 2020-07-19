import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import ProjectsIndex from '../components/cruds/Projects/Index.vue'
import ProjectsCreate from '../components/cruds/Projects/Create.vue'
import ProjectsShow from '../components/cruds/Projects/Show.vue'
import ProjectsEdit from '../components/cruds/Projects/Edit.vue'
import LanguagesIndex from '../components/cruds/Languages/Index.vue'
import LanguagesCreate from '../components/cruds/Languages/Create.vue'
import LanguagesShow from '../components/cruds/Languages/Show.vue'
import LanguagesEdit from '../components/cruds/Languages/Edit.vue'
import ContextsIndex from '../components/cruds/Contexts/Index.vue'
import ContextsCreate from '../components/cruds/Contexts/Create.vue'
import ContextsShow from '../components/cruds/Contexts/Show.vue'
import ContextsEdit from '../components/cruds/Contexts/Edit.vue'
import StringsIndex from '../components/cruds/Strings/Index.vue'
import StringsCreate from '../components/cruds/Strings/Create.vue'
import StringsShow from '../components/cruds/Strings/Show.vue'
import StringsEdit from '../components/cruds/Strings/Edit.vue'
import TranslationsIndex from '../components/cruds/Translations/Index.vue'
import TranslationsCreate from '../components/cruds/Translations/Create.vue'
import TranslationsShow from '../components/cruds/Translations/Show.vue'
import TranslationsEdit from '../components/cruds/Translations/Edit.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/projects', component: ProjectsIndex, name: 'projects.index' },
    { path: '/projects/create', component: ProjectsCreate, name: 'projects.create' },
    { path: '/projects/:id', component: ProjectsShow, name: 'projects.show' },
    { path: '/projects/:id/edit', component: ProjectsEdit, name: 'projects.edit' },
    { path: '/languages', component: LanguagesIndex, name: 'languages.index' },
    { path: '/languages/create', component: LanguagesCreate, name: 'languages.create' },
    { path: '/languages/:id', component: LanguagesShow, name: 'languages.show' },
    { path: '/languages/:id/edit', component: LanguagesEdit, name: 'languages.edit' },
    { path: '/contexts', component: ContextsIndex, name: 'contexts.index' },
    { path: '/contexts/create', component: ContextsCreate, name: 'contexts.create' },
    { path: '/contexts/:id', component: ContextsShow, name: 'contexts.show' },
    { path: '/contexts/:id/edit', component: ContextsEdit, name: 'contexts.edit' },
    { path: '/strings', component: StringsIndex, name: 'strings.index' },
    { path: '/strings/create', component: StringsCreate, name: 'strings.create' },
    { path: '/strings/:id', component: StringsShow, name: 'strings.show' },
    { path: '/strings/:id/edit', component: StringsEdit, name: 'strings.edit' },
    { path: '/translations', component: TranslationsIndex, name: 'translations.index' },
    { path: '/translations/create', component: TranslationsCreate, name: 'translations.create' },
    { path: '/translations/:id', component: TranslationsShow, name: 'translations.show' },
    { path: '/translations/:id/edit', component: TranslationsEdit, name: 'translations.edit' },
    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
