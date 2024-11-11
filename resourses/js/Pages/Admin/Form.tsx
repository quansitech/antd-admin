import {usePage} from "@inertiajs/react";
import {lazy, Suspense, useEffect, useState} from "react";
import {ReactComponentLike} from "prop-types";
import {Form} from "@quansitech/antd-admin";

export default function () {
    const props = usePage<any>().props

    const [Component, setComponent] = useState<ReactComponentLike>()
    useEffect(() => {
        setComponent(lazy(() => Form))
    }, []);

    return <>{Component
        && <Suspense><Component {...props}/></Suspense>
    }</>
}