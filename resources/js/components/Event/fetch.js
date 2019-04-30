const eventFetch = new Vue({
    el: '#event-fetch',
    data: () => ({
        page: 1,
        events: [],
        viewFetchButton: true,
    }),
    methods: {
        fetch() {
            axios.get(`/event/fetch?page=${this.page+1}`).then(response => {
                this.events = this.events.concat(response.data.data);
                this.page += 1;
                this.viewFetchButton = response.data.to !== response.data.total;
            }).catch(error => {

            });
        }
    }
});