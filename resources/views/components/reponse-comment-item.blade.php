@props(['reponse'])


<!-- reponses content -->
<div class="pt-6 " style="position: left">
    <!-- Reponse row -->
    <div class="media flex pb-4 justify-between">
       
        <div class="media-body md:ml-48 w-full rounded-xl bg-zinc-200 mr-4 pt-3">
            <div class="text-end">
                <a class="inline-block text-base font-bold mr-2" href="#">{{ $reponse->user->name }}</a>
            </div>

            <div class="   mx-3 p-3 rounded-2xl w-auto flex-row">
                <p class="flex justify-end">{!! nl2br(e( $reponse->reponse )) !!}</p>
                <div class="mt-4 flex justify-end items-center ">
                    <span class=" left text-slate-500 dark:text-slate-300">{{ $reponse->created_at->format('D d M Y H:i:s') }}</span>

                    <a class="inline-flex items-center py-2 ml-3 " href="{{ route('post.storeLikeReponse',$reponse) }}">
                        <x-like.logo-love :model="$reponse" />

                    </a>
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