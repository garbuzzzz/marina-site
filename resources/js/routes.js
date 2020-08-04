import AdminHome from './components/admin/AdminHome'
import AdminSection from './components/admin/AdminSection'
import AdminSectionEdit from './components/admin/AdminSectionEdit'
import AdminFeedbacks from './components/admin/AdminFeedbacks'
import AdminFeedbacksEdit from './components/admin/AdminFeedbacksEdit'
import AdminFeedbacksAdd from './components/admin/AdminFeedbacksAdd'

export default {
	mode: 'history',
	routes: [
		{
			path: '/admin/',
			component: AdminHome,
			name: 'admin-home'
		},
		{
			path: '/admin/banner',
			component: AdminSection,
			name: 'admin-banner'
		},
		{
			path: '/admin/banner/edit',
			component: AdminSectionEdit,
			name: 'admin-banner-edit',
			props: true
		},
		{
			path: '/admin/about',
			component: AdminSection,
			name: 'admin-about'
		},
		{
			path: '/admin/about/edit',
			component: AdminSectionEdit,
			name: 'admin-about-edit',
			props: true
		},
		{
			path: '/admin/services',
			component: AdminSection,
			name: 'admin-services'
		},
		{
			path: '/admin/services/edit',
			component: AdminSectionEdit,
			name: 'admin-services-edit',
			props: true
		},
		{
			path: '/admin/contacts',
			component: AdminSection,
			name: 'admin-contacts',
		},
		{
			path: '/admin/contacts/edit',
			component: AdminSectionEdit,
			name: 'admin-contacts-edit',
			props: true
		},
		{
			path: '/admin/feedbacks',
			component: AdminFeedbacks,
			name: 'admin-feedbacks',
		},
		{
			path: '/admin/feedbacks-edit',
			component: AdminFeedbacksEdit,
			name: 'admin-feedbacks-edit',
			props: true
		},
		{
			path: '/admin/feedbacks-add',
			component: AdminFeedbacksAdd,
			name: 'admin-feedbacks-add',
			props: true
		},
		
	]
}