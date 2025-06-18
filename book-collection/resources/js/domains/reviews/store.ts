import { computed } from "vue";
import { storeModuleFactory } from "../../services/store";
const baseReviewStore = storeModuleFactory('reviews');

baseReviewStore.getters.byBookId = (id: number) => computed(() => Object.values(baseReviewStore.getters.all.value).filter(review => review.book_id == id));

export const reviewStore = baseReviewStore;