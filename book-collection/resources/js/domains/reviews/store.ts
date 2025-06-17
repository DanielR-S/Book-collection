import { computed } from "vue";
import { storeModuleFactory } from "../../services/store";
export const baseReviewStore = storeModuleFactory('reviews');

export const reviewStore = {
    ...baseReviewStore,
    getters: {
        byBookId: (id: number) => computed(() => Object.values(baseReviewStore.getters.all.value).filter(review => review.book_id == id))
    }
}