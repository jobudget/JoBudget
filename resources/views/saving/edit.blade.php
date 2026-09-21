<x-app-layout>
    <div class="py-6">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Edit Savings
                </h2>

                <p class="text-sm text-gray-500">
                    Update your savings record
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

                <form action="{{ route('saving.update', $saving) }}" method="POST">

                    @csrf
                    @method('PUT')

                    {{-- Description --}}
                    <div class="mb-5">
                        <label for="description"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>

                        <input type="text"
                               name="name"
                               id="description"
                               value="{{ old('description', $saving->description) }}"
                               class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">

                        @error('description')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Amount --}}
                    <div class="mb-5">
                        <label for="amount"
                               class="block text-sm font-medium text-gray-700 mb-2">
                            Amount
                        </label>

                        <input type="number"
                               name="amount"
                               id="amount"
                               value="{{ old('amount', $saving->amount) }}"
                               step="0.01"
                               min="0.01"
                               class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">

                        @error('amount')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end gap-3">

                        <a href="{{ route('saving.index') }}"
                           class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200">
                            Cancel
                        </a>

                        <button type="submit"
                                class="px-5 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700">
                            Update Savings
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>