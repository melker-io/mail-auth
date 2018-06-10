## Add to auth config
´
'providers' => [
    'mail-users' => [
        'driver' => 'eloquent',
        'model' => Melkerio\MailAuth\MailUser::class,
    ],
    ...
]
´
and
´
'guards' => [
    'mail' => [
        'driver' => 'session',
        'provider' => 'mail-users',
    ],
    ...
],
´

