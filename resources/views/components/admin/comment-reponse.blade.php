@props(['reponse'])

<!-- reponses content -->
<div class="pt-6 w-full" style="position: left">
    <!-- Reponse row -->
    <div class="media flex pb-4 w-full justify-between">
       
        <div class="media-body w-full">
            <div class="text-end">
                <a class="inline-block text-base font-bold mr-2" href="#">{{ $reponse->user->name }}</a>
            </div>

            <div class="  bg-zinc-200 mx-3 p-3 rounded-2xl w-auto flex-row">
                <p class="flex justify-end">{!! nl2br(e( $reponse->reponse )) !!}</p>
                <div class="mt-4 flex justify-end items-center ">
                    <a class="inline-flex items-center py-2 mr-3" href="{{ route('post.storeLikeReponse',$reponse) }}">
                    
                        <x-like.logo-love :model="$reponse" />

                    </a>
                    <span class=" left text-slate-500 dark:text-slate-300">{{ $reponse->created_at->format('D d M Y H:i:s') }}</span>
                </div>
            </div>
        </div>

        <div>
            <a class="mr-4" href="#">
                <img class="rounded-full max-w-none w-12 h-12" src="{{ asset($reponse->user->profileUrl) }}" />
            </a>
        </div>
    </div>
    <!-- End reponses row -->
</div>