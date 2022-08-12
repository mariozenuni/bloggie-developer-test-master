import moment from 'moment/moment';

Vue.filter('prettyDate', function (value) {
    if (!value) {
        return value;
    }

    return moment(String(value)).format('DD/MM/YYYY')
});

Vue.filter('prettyDateTime', function (value) {
    if (!value) {
        return value;
    }

    return moment(String(value)).format('DD/MM/YYYY - HH:mm')
});
