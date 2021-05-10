let state = {
    user: {},
    isAdmin: true,
    cats: [
        {
            'id': 1,
            'size': 'small',
            'location': 'kampala',
        },
        {
            'id': 3,
            'size': 'high',
            'location': 'kampala',
        },
        {
            'id': 2,
            'size': 'big',
            'location': 'Kawempe',
        }
    ],
    personalData: {},
    fone: {},
    countofproperties: 0,
    ftwo: {},
    searching: false,
    loadingSearches: false,
    SearchResults: null,
    kira: {},
    mukono: {},
    status: null,
    transaction: null,
    clients: [],
    laravelData: {},
    official: {},
    hostels: [],
    apartments: [],
    arcades: [],
    malls: [],
    rentals: [],
    officespace: [],
    uploads: [],
    properties: [],
    token: localStorage.getItem('token') || null,
}

export default state