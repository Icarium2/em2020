<x-app-layout>

    @foreach($groups as $groupName => $group)
    @php $x = 1; @endphp
    <div class="groups w-full mb-8">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Grupp {{ $groupName }}
                        </th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Land
                        </th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          M
                        </th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          V
                        </th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          O
                        </th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          F
                        </th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Mål
                        </th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          P
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($group as $country => $stats)

                            <tr>
                                <td class="px-3 py-4 whitespace-nowrap">
                                    <div class="text-sm">
                                        {{ $x }}
                                    </div>
                                </td>
                                <td class="px-3 py-4 w-40">
                                <div class="text-sm text-gray-900 flex items-center">
                                    <img src="{{asset('flags/'.$country.'.webp') }}" class="w-7 h-7 mr-2" />
                                    <p>{{ $country }}</p>
                                </div>
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm">
                                {{ $stats['playedGames'] }}
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm">
                                    {{ $stats['wins'] }}
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm">
                                    {{ $stats['draws'] }}
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm">
                                    {{ $stats['loses'] }}
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm">
                                    {{ $stats['difference'] }}
                                </td>
                                <td class="px-3 py-4 whitespace-nowrap text-sm">
                                    {{ $stats['points'] }}
                                </td>
                            </tr>
                            @php $x++; @endphp
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
    @endforeach

</x-app-layout>
