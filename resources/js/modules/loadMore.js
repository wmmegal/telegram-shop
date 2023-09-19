export default () => ({
    loading: false,
    nextPageUrl: null,
    wrap: null,
    show: true,
    load() {
        if (!this.nextPageUrl) return;

        this.loading = true;

        axios.get(this.nextPageUrl).then(({data}) => {
            this.wrap.insertAdjacentHTML('beforeend', data.html)

            this.nextPageUrl = data.nextPageUrl;
            this.loading = false;

            if (this.nextPageUrl == null) {
                this.show = false;
            }
        })
    },
    init() {
        this.wrap = document.querySelector('#products-list');
    }
})
