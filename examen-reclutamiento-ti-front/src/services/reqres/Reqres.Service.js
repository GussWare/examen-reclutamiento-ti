import axios from 'axios';
import constants from '../../config/constants';

class ReqresService {

    constructor() {
        this.url = constants.BASE_URL;     
    }

    async findAll() {
        const response = await axios.get(this.url + 'reqres/users');
        return response.data;
    }

    async create(user) {
        const response = await axios.post(this.url + 'reqres/users/create', user);
        return response.data;
    }

    async update(user) {
        const response = await axios.post(this.url + 'reqres/users/update', user);
        return response.data;
    }

    async delete(id) {
        const response = await axios.post(this.url + 'reqres/users/update', { id: id });
        return response.data;
    }
}

export default new ReqresService();