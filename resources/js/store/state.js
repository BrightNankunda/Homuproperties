let state = {
    user: {},
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
    fone: {},
    countofproperties: 0,
    ftwo: {},
    kira: {},
    mukono: {},
    status: null,
    transaction: null,
    clients: [],
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