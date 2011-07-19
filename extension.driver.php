<?php
	
	//require_once EXTENSIONS . '/respondhd/lib/.php';
	
	class Extension_RespondHD extends Extension {
		
		public function about() {
			return array(
				'name'			=> 'Respond Handset Detection',
				'version'		=> '0.1',
				'release-date'	=> '2011-07-18',
				'author'		=> array(
					'name'			=> 'David Oliver',
					'website'		=> 'http://doliver.co.uk',
					'email'			=> 'david@doliver.co.uk'
				)
			);
		}
		
		public function getSubscribedDelegates() {
			return array(
				array(
					'page'		=> '/frontend/',
					'delegate'	=> 'FrontendInitialised',
					'callback'	=> 'initialise'
				),
				array(
					'page'		=> '/system/preferences/',
					'delegate'	=> 'AddCustomPreferenceFieldsets',
					'callback'	=> 'appendPreferences'
				)
			);
		}
		
		public function appendPreferences($context) {
			$group = new XMLElement('fieldset');
			$group->setAttribute('class', 'settings');
			$group->appendChild(new XMLElement('legend', __('Respond HD')));
			
			$label = Widget::Label(__('handsetdetection.com Account Email'));
			$label->appendChild(Widget::Input('settings[respondhd][hdemail]', Symphony::Configuration()->get('hdemail', 'respondhd'), 'text'));
			$group->appendChild($label);
			
			$label = Widget::Label(__('handsetdetection.com Account Secret'));
			$label->appendChild(Widget::Input('settings[respondhd][hdsecret]', Symphony::Configuration()->get('hdsecret', 'respondhd'), 'password'));
			$group->appendChild($label);
			
			$label = Widget::Label(__('handsetdetection.com Site Profile ID'));
			$label->appendChild(Widget::Input('settings[respondhd][hdsiteid]', Symphony::Configuration()->get('hdsiteid', 'respondhd'), 'text'));
			$group->appendChild($label);
			
			$context['wrapper']->appendChild($group);
		}
		
		public function initialise() {
			
		}
		
	}
	
?>
