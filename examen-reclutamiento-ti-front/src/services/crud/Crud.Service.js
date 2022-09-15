import axios from 'axios';
import constants from '../../config/constants';

class CrudService {

    constructor() {
        this.url = constants.BASE_URL;     
    }

    async findAll() {
        const response = await axios.get(this.url + 'productos');
        return response.data;
    }

    async create(producto) {
        const response = await axios.post(this.url + 'productos/create', producto);
        return response.data;
    }

    async update(producto) {
        const response = await axios.post(this.url + 'productos/update', producto);
        return response.data;
    }

    async delete(id_producto) {
        const response = await axios.post(this.url + 'productos/update', { id_producto: id_producto });
        return response.data;
    }
}

export default new CrudService();