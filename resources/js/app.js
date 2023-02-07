import Alpine from 'alpinejs';
import Focus from '@alpinejs/focus';
import Collapse from '@alpinejs/collapse';
import AlpineFloatingUI from '@awcodes/alpine-floating-ui';

Alpine.plugin(Focus);
Alpine.plugin(Collapse);
Alpine.plugin(AlpineFloatingUI);

window.Alpine = Alpine;

Alpine.start();
