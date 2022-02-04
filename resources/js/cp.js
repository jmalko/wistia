import WistiaFieldtype from './components/fieldtypes/WistiaFieldtype.vue';
 
Statamic.booting(() => {
    Statamic.$components.register('wistia-fieldtype', WistiaFieldtype);
});
